#Software Engineering Project - Group 14
#written and debugged by: Priya, Lasya, Varun
import numpy as np
from numpy import matrix
from numpy import linalg
import math
import sys
import MySQLdb


#opening DB connection
connection = MySQLdb.connect(host = "localhost", user = "root", passwd = "", db = "webapps_grp-14")
x = connection.cursor(MySQLdb.cursors.DictCursor)

xn=[1,2,3,4,5,6,7,8,9,10] 

ticker = sys.argv[1]
tfinal = list()
t1_list = list()

#SQl Query to fetch all ask_prices
x.execute(" SELECT ask_price as OPEN FROM price_current WHERE ticker='%s' ORDER BY previous_close desc LIMIT 110" %(ticker)) #d
#x.execute(" SELECT high_price as OPEN FROM price_history WHERE ticker='%s' ORDER BY close_price " %(ticker))
train_data  = x.fetchall()


N = 10
j = 0
t1 = np.zeros((10, 10), float)
t1_array = []
k=0

for i in xrange(x.rowcount):
    temp = train_data[i]['OPEN']
    temp = float(temp)
	
    if((i % 10 == 0)and(i!=0)):
        tfinal.append(temp)
        
    else:
        t1[k][j]=temp    
        j += 1
        if(j==10):
            j=0
            k += 1
            
tfinal = np.asarray(tfinal)

Num_train_sets=10

m=2                 
M=m+1
a=0.005            
b=11.1              
rel_err_dr=0


for i in range(len(tfinal)):
    rel_err_dr=rel_err_dr+tfinal[i]
    
x=11

def bayesian():

    for k in range(Num_train_sets):         

        t = np.zeros((N,1),float)
        phix = np.zeros((M,1),float)
        sum_phixn = np.zeros((M,1),float)
        sum_phixn_t = np.zeros((M,1),float)
        global var
        for i in range(M):                 
            phix[i][0]=math.pow(x,i)
        

        for i in range(N):                 
            t[i][0]=t1[k][i]
            
        for j in range(N):
            for i in range(M):
                sum_phixn[i][0]=sum_phixn[i][0]+math.pow(xn[j],i)
                sum_phixn_t[i][0]=sum_phixn_t[i][0]+t[j][0]*math.pow(xn[j],i)
		S=np.linalg.inv(a*np.identity(M)+b*np.dot(sum_phixn,phix.T))
		var=np.dot((phix.T),np.dot(S,phix)) 
		var=var+ 1/b
	
	mean=b*np.dot(phix.T,np.dot(S,sum_phixn_t))
	value_predict= mean+ (2.99*( math.sqrt(var)))
	print("The predicted value is ")
	
	print value_predict[0][0]
	
	return value_predict


bayesian()