#Software Engineering Project - Group 14
import sys
import numpy
import decimal
import time
import scipy
import os
from numpy import genfromtxt
from sklearn import *
from scipy.stats import norm
from sklearn import svm
import math
import analyzer
import MACD 
import MySQLdb
import json, urllib2, time


############################################################################################
def get_svm_prediction(stock_sym,predicted_y_high_s):
    '''This module splits the data into training and test data set
       and verifies if test data follows the same pattern as training data using 
       SVM classifer
    '''
    stock_price = get_hist_stock_price(stock_sym)
    #train_data, test_data = _split_data(stock_price)
    train_data = stock_price
    test_data = predicted_y_high_s

    return _svm_predictor(train_data,test_data)
	
##############################################################################
	
def _svm_predictor(train_data,test_data):
    '''Given training and test data set predict if test data 
       falls in the pattern training data set
    '''
    svm_long_term_predict = svm.OneClassSVM()
    svm_long_term_predict.fit(train_data)
    return svm_long_term_predict.predict(test_data)

#############################################################################
def get_hist_stock_price(stock_sym):
    historicalPrices = []
    # login to API
    urllib2.urlopen("http://api.kibot.com/?action=login&user=guest&password=guest")
	
    # get 1 year of data from API (business days only)
    url = "http://api.kibot.com/?action=history&symbol=" + stock_sym + "&interval=daily&period=365&unadjusted=1&regularsession=1"
    apiData = urllib2.urlopen(url).read().split("\n")
	
    for line in apiData:
        if(len(line) > 0):
            tempLine = line.split(',')
            price = float(tempLine[2])
            historicalPrices.append(price)
			
	return historicalPrices

	
##########################################################################################################
   
    #------------------------------------------------------------------------
    # Long term prediction
def svmr(stock_sym):
	predicted_y_high= analyzer.analyzeSymbol(stock_sym)

	long_svm_int = get_svm_prediction(stock_sym,predicted_y_high)
	if (long_svm_int == +1):
	   long_svm = "strong"
	else:
	   long_svm = "weak"
        #---------------------------------------------------------------
        #Get 50 day MACD and compare with ANN prediction
	long_macd = MACD.get_macd(stock_sym)
            
	if (long_macd < predicted_y_high):
		long_macd = "rising"
		print("BUY")
	else:
		long_macd = "falling"
		print("SELL")

	return predicted_y_high,long_macd,long_svm
####################################################################################################################
if __name__ == "__main__":
    svmr(sys.argv[1])
