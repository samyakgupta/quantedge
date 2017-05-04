### 
# QUANTEDGE - The Ultimate Stock Market Insights
### 

# ANALYSIS DONE ON REAL-TIME DATA
## SENTIMENT ANALYSIS
Sentiment Analysis can be performed on the news that is sourced using HPE HavenOnDemand. This news is sourced from all over the Internet giving investors the required news. Also, sentiment analysis is done on each news item which tells whether a news in positive or negative. Based on all news items an overall score is given which gives the overall sentiment of the stock. Thus, investors can merely copy the sentiment of a stock in the market and base their investment decisions.

Sentiment Analysis also known as opinion mining, is the process of determining whether a piece of writing is positive, negative or neutral. It’s also known as opinion mining. A common use case for this technology is to discover how people feel about a particular topic.

The sentiment analysis algorithm built on MS Azure:

![](https://raw.githubusercontent.com/samyakgupta/quantedge/master/pictures/Screenshot%20(11).png)

The following image is an example of a search made on the application:

![](https://raw.githubusercontent.com/samyakgupta/quantedge/master/pictures/13.png)

# ANALYSIS DONE ON THE HISTORICAL DATA
## NEURAL NETWORK ANALYTICS MODEL
A neural network is a powerful computational data model that is able to capture and represent complex input/output relationships. The motivation for the development of neural network technology stemmed from the desire to develop an artificial system that could perform "intelligent" tasks similar to those performed by the human brain. Neural networks resemble the human brain in the following two ways:
1.	A neural network acquires knowledge through learning.
2.	A neural network's knowledge is stored within inter-neuron connection strengths known as synaptic weights.
The true power and advantage of neural networks lies in their ability to represent both linear and non-linear relationships and in their ability to learn these relationships directly from the data being modeled.

An analytics model based on Neural Networks was built using Microsoft's Azure services. The screenshot of the algorithm is shown:

![](https://raw.githubusercontent.com/samyakgupta/quantedge/master/pictures/8.jpg)

The results obtained when this Algorithm was run on historical database of the stocks of APPL (Apple Inc.) from last 20 years are as shown below. This database contained the daily stock movement with many indices. I considered only the Opening, Closing, High and Low values of the stock to make the calculations.

![](https://raw.githubusercontent.com/samyakgupta/quantedge/master/pictures/9.jpg)

From the analysis of the results that the algorithm generated, it can very well be seen that the **frequency of lowest error is maximum**. This cements the fact that Neural Networks can be used as a reliable Algorithm to predict future stock prices.

## LINEAR REGRESSION ANALYTICS MODEL
Linear regression is a statistical procedure for predicting the value of a dependent variable from an independent variable when the relationship between the variables can be described by a linear model.
A linear regression equation can be written as Yp= mX + b, where Yp is the predicted value of the dependent variable, m is the slope of the regression line, and b is the Y-intercept of the regression line. 

In statistics, linear regression is a method of estimating the conditional expected value of one variable y given the values of some other variable or variables x. The variable of interest, y, is conventionally called the "dependent variable". The terms "endogenous variable" and "output variable" are also used. The other variables x are called the "independent variables". The terms "exogenous variables" and "input variables" are also used. The dependent and independent variables may be scalars or vectors. If the independent variable is a vector, one speaks of multiple linear regression.

We again built an analytics model, but this time it was based on Linear Regression. I made use of Microsoft's Azure services. The screenshot of the algorithm is shown:

![](https://raw.githubusercontent.com/samyakgupta/quantedge/master/pictures/10.jpg)

Again the same dataset as used for Neural Networks model was used, with the following results:

![](https://raw.githubusercontent.com/samyakgupta/quantedge/master/pictures/11.jpg)

From the analysis of results, it can easily be observed that the frequency of **higher errors is more in this model compared to Neural Network Model**. Hence, this method is not as reliable as the Neural Network Model.

# EXTRA FEATURES
### 1. Create your own portfolio
The application enables you to create a portfolio from the various stocks that are listed on the stock market. You can search for stocks based on Sector and Industry.

![](https://raw.githubusercontent.com/samyakgupta/quantedge/master/pictures/1.png)


![](https://raw.githubusercontent.com/samyakgupta/quantedge/master/pictures/2.png)


![](https://raw.githubusercontent.com/samyakgupta/quantedge/master/pictures/3.png)


![](https://raw.githubusercontent.com/samyakgupta/quantedge/master/pictures/Screenshot%20(26).png)
  
### 2. Real-time updates on stocks in your portfolio 
The application uses real-time data to provide the user with up to date information on the movement of the stocks that are listed in the portfolio. I have used Yahoo Finance API (now deprecated) to collect this information in real-time (Yahoo's data lags market movements by a few minutes).

![](https://raw.githubusercontent.com/samyakgupta/quantedge/master/pictures/6.png)
 
### 3. Real-time graphs 
The important feature of this toolkit are the Technical Analysis graphs which show the exponential moving averages for a short term period i.e. a few days. The data can be adjusted to view the trends for long term periods to understand and derive decisions from the available Technical Analysis.

![](https://raw.githubusercontent.com/samyakgupta/quantedge/master/pictures/7.png)


### NOTE:
The size of the data that I used in most of my calculations include the last 20 years of daily stock data of all the stocks that are listed in the market. The metadata is:

![](https://raw.githubusercontent.com/samyakgupta/quantedge/master/pictures/12.jpg)
 
