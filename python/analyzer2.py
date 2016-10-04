#Software Engineering Project - Group 14
#written and debugged by: Priya, Lasya, Varun
import json, urllib2, time
from datetime import datetime
from time import mktime
import sys

from neuralNetwork import NeuralNetwork


## ================================================================

def normalizePrice(price, minimum, maximum):
    return ((2*price - (maximum + minimum)) / (maximum - minimum))

def denormalizePrice(price, minimum, maximum):
    return (((price*(maximum-minimum))/2) + (maximum + minimum))/2

## ================================================================

def rollingWindow(seq, windowSize):
    it = iter(seq)
    win = [it.next() for cnt in xrange(windowSize)] # First window
    yield win
    for e in it: # Subsequent windows
        win[:-1] = win[1:]
        win[-1] = e
        yield win

def getMovingAverage(values, windowSize):
    movingAverages = []
    
    for w in rollingWindow(values, windowSize):
        movingAverages.append(sum(w)/len(w))

    return movingAverages

def getMinimums(values, windowSize):
    minimums = []

    for w in rollingWindow(values, windowSize):
        minimums.append(min(w))
            
    return minimums

def getMaximums(values, windowSize):
    maximums = []

    for w in rollingWindow(values, windowSize):
        maximums.append(max(w))

    return maximums

## ================================================================

def getTimeSeriesValues(values, window):
    movingAverages = getMovingAverage(values, window)
    minimums = getMinimums(values, window)
    maximums = getMaximums(values, window)

    returnData = []

    # build items of the form [[average, minimum, maximum], normalized price]
    for i in range(0, len(movingAverages)):
        inputNode = [movingAverages[i], minimums[i], maximums[i]]
        price = normalizePrice(values[len(movingAverages) - (i + 1)], minimums[i], maximums[i])
        outputNode = [price]
        tempItem = [inputNode, outputNode]
        returnData.append(tempItem)

    return returnData

## ================================================================

def getHistoricalData(stockSymbol):
    historicalPrices = []
    
    # login to API
    urllib2.urlopen("http://api.kibot.com/?action=login&user=guest&password=guest")

    # get 1 year of data from API (business days only)
    url = "http://api.kibot.com/?action=history&symbol=" + stockSymbol + "&interval=daily&period=365&unadjusted=1&regularsession=1"
    apiData = urllib2.urlopen(url).read().split("\n")
    for line in apiData:
        if(len(line) > 0):
            tempLine = line.split(',')
            price = float(tempLine[1])
            historicalPrices.append(price)

    return historicalPrices

## ================================================================

def getTrainingData(stockSymbol):
    historicalData = getHistoricalData(stockSymbol)

    # reverse it so we're using the most recent data first, ensure we only have 9 data points
    historicalData.reverse()
    del historicalData[9:]

    # get five 5-day moving averages, 5-day lows, and 5-day highs, associated with the closing price
    trainingData = getTimeSeriesValues(historicalData, 5)

    return trainingData

def getPredictionData(stockSymbol,flag):
	#print "1st"
	
	historicalData = getHistoricalData(stockSymbol)
	historicalData.reverse()
	#print historicalData
    # reverse it so we're using the most recent data first, then ensure we only have 5 data points
	global check
	check=flag
	
	if(check==0):
		del historicalData[5:]
	else:
		del historicalData[5:]
		historicalData[1]=historicalData[0]
		historicalData[2]=historicalData[1]
		historicalData[3]=historicalData[2]
		historicalData[4]=historicalData[3]
		historicalData[0]=new_value

	predictionData = getTimeSeriesValues(historicalData, 5)
	
	return predictionData[0][0]

## ================================================================

def analyzeSymbol(stockSymbol):
	startTime = time.time()
	flag=0
	trainingData = getTrainingData(stockSymbol)
    
	network = NeuralNetwork(inputNodes = 3, hiddenNodes = 3, outputNodes = 1)

	network.train(trainingData)
	
    # get rolling data for most recent day

	network.train(trainingData)
	for i in range(0,5):
    # get rolling data for most recent day
		predictionData = getPredictionData(stockSymbol,flag)
		returnPrice = network.test(predictionData)

    # de-normalize and return predicted stock price
		predictedStockPrice = denormalizePrice(returnPrice, predictionData[1], predictionData[2])
    
		print predictedStockPrice
		flag+=1
		global new_value
		new_value=predictedStockPrice
	
	return predictedStockPrice
	

## ================================================================

if __name__ == "__main__":
	analyzeSymbol(sys.argv[1])