#Software Engineering Group-14
import numpy as np
import matplotlib.pyplot as plotter
import MySQLdb
import sys
import urllib2

#connection = MySQLdb.connect(host = "localhost", user = "root", passwd = "", db = "webapps_grp-14")
def historicalData(ticker):
	historicalPrices = []
    
    # login to API
	urllib2.urlopen("http://api.kibot.com/?action=login&user=guest&password=guest")

    # get 1 year of data from API (business days only)
	url = "http://api.kibot.com/?action=history&symbol=" + ticker + "&interval=daily&period=" + sys.argv[2] + "&unadjusted=1&regularsession=1"
	apiData = urllib2.urlopen(url).read().split("\n")
	for line in apiData:
		if(len(line)>0):
		   tempLine=line.split(',')
		   price=float(tempLine[2])
		historicalPrices.append(price)
	#print historicalPrices
	return historicalPrices


list_of_prices = historicalData(sys.argv[1])

l = len(list_of_prices)
x_ax = np.linspace(0,l,l); 
plotter.plot(x_ax, list_of_prices)
plotter.grid('on')
plotter.xlabel('Number of days')
plotter.ylabel('Closing price')
plotter.title(str(sys.argv[1]))
plotter.show()

