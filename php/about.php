<!DOCTYPE html>
<?php
//written and debugged by: Kiran, Vikti
session_start();

// if(!($_SESSION['name']))
// {

// header("location: login.php");

// }
// ?>
<html>
<body id="bod">
<head><link rel="stylesheet" href="interface.css">
<link rel="stylesheet" href="about.css">
 <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></head>

<div id="dive">
<button class="b1" onclick="window.location.href='interface.php'"><i class="glyphicon glyphicon-home"></i>&nbsp Home</button>

<button class="b1" onclick="window.location.href='contact.php'"><i class="glyphicon glyphicon-envelope"></i>&nbsp Contact</button>

<a href="logout.php"> <input type="button" id="logout" value="Sign out"/> </a>
<button id="welcome"><i class="glyphicon glyphicon-user"></i>&nbsp Welcome! </button>

<div id="div1">
<h1 id="h1"><b><span class="dol">$</span><span id="s1">talk</span><span id="s2">The</span><span class="dol">$</span><span id="s3">tock</span></b></h1>
</div> 
<h4 id="wel"> ((Name))! Hope you liked our website and out effort to predict stock values and help you in a better stock purchase and resale. Our main effort was to assist you in your decision to buy or sell stocks based on our predictions. We have used various algorithms for predicting long-long term and short-term stock prices. We try to explain a few of them to you</h4>
<h3 class="lt">Long-Term Predictions</h3>
<p class="pred">
<span class="sp1">Artificial Neural Networks:</span><br>
Artificial neurons are inspired from biological neuronal structure. The transmission of a signal from one neuron to
another through synapses is a complex chemical process in which specific transmitter substances are released from the sending side of the junction. The effect is to raise or lower the electrical potential inside the body of the receiving cell. If this graded potential reaches a threshold, the neuron fires. It is this
characteristic that the artificial neuron model attempt to reproduce.<br>
<span class="sp1">SVM(Support Vector Machine):</span><br>
 Another aspect of our task is to minimize trading risk. In this part, we will use the SVM regression model and start from the basic intuition in SVM algorithm. In SVM, the further distance between the point and hyperplane is, more confident we are for the prediction we made, whereas, our prediction cannot be very accurate when the point is close to hyper-plane. To minimize the trading risk, we can pick out these risky points and ignore their prediction labels.
Thus, we need to classify the original data into at least three classes, negative, neutral and positive. This is the intuition that leads to the prototype of our multiclass classification model.


</p>
<h3 class="lt">Short-Term Predictions</h3>
<p class="pred">
<span class ="sp1">The Bayesian Predictor</span><br>
The input to the Bayesian estimator are the training data set close stock prices(x) every day with time instances (t) for the past year. The Close_price for next day is predicted. Consequently, the mean and variance are determined from the given data set. The value to be predicted is calculated from mean and variance. The value of M should be an optimum value(>3) for large data sets to get accurate results. Simple machine learning technique that give accurate results


</p>
