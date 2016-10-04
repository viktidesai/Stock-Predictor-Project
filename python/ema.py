#Software Engineering Group-14
import urllib2
import time
import datetime
import numpy as np
#import matplotlib.pyplot as plt
#import matplotlib.ticker as mticker
#import matplotlib.dates as mdates
#from matplotlib.finance import candlestick
import matplotlib
#import pylab

def historicalData(ticker):
	historicalPrices = []
    
    # login to API
	urllib2.urlopen("http://api.kibot.com/?action=login&user=guest&password=guest")

    # get 1 year of data from API (business days only)
	url = "http://api.kibot.com/?action=history&symbol=" + ticker + "&interval=daily&period=10&unadjusted=1&regularsession=1"
	apiData = urllib2.urlopen(url).read().split("\n")
	for line in apiData:
		if(len(line)>0):
		   tempLine=line.split(',')
		   price=float(tempLine[2])
		historicalPrices.append(price)
	print historicalPrices
	return historicalPrices

  
## ================================================================


def ExpMovingAverage(values, window):
	weights = np.exp(np.linspace(-1., 0., window))
	#print weights
	weights /= weights.sum()
	a =  np.convolve(values, weights, mode='full')[:len(values)]
	#a[:window] = a[window]
	print a
	return a

	
if __name__ == "__main__":
	
	ExpMovingAverage(historicalData("GOOG"),8)
	
	