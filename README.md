### 
# QUANTEDGE - The Ultimate Stock Market Toolbox and Predictor
### 
The application enables you to create a portfolio from the various stocks that are listed on the stock market. You can search for stocks based on Sector and Industry.

![](quantedge/1.png)


![](https://lh5.googleusercontent.com/99jX6UTQng7NovF8-ru-SmfXs2T6bzKMsWQ1yKMtQRgQSaEwrr5FD2dyWQQN8TfXez9aMKDKdmPV_aw=w1366-h648-rw)


![](https://lh6.googleusercontent.com/rYXa991ioiX82amp2iJ1kQ6FrijtZsbRvwbmiX3Hp9GvQuS8AyBSTwJ2U885lfzfL1L3LDo4xNYjWzM=w1366-h648-rw)


![](https://lh5.googleusercontent.com/RkpQ8mTyQG-elh1T15GggE6c6wFzBFEpzJomGnXngULELonf09zJEvbf9fuSXUE4knkMQPx4fMYCuEw=w1366-h648-rw)
  
The application uses real-time data to provide the user with up to date information on the movement of the stocks that are listed in the portfolio. I have used Yahoo Finance APIs to collect this information in real-time (Yahoo's data lags market movements by a few minutes).

![](https://lh4.googleusercontent.com/WBF91GUrG-72zmCT2I7fc29p77QC9wu8b8mo7tYwunpC8VaFHaPAPpqdUxnUus7am5hmKLoJY_t0qhs=w1366-h648-rw)
 

The important feature of this toolkit are the Technical Analysis graphs which show the exponential moving averages for a short term period i.e. a few days. The data can be adjusted to view the trends for long term periods to understand and derive decisions from the available Technical Analysis.

![](https://lh6.googleusercontent.com/mDHaPpBRM7EPB0yVhUfhLPiE5XZFLQUdBIuUYink7FEbeUVQUrBwhUCFVxxzQsoP26jIaPT7FW9Gyvo=w1366-h648-rw)


# ANALYSIS DONE ON THE HISTORICAL DATA
### NEURAL NETWORK ANALYTICS MODEL
A neural network is a powerful computational data model that is able to capture and represent complex input/output relationships. The motivation for the development of neural network technology stemmed from the desire to develop an artificial system that could perform "intelligent" tasks similar to those performed by the human brain. Neural networks resemble the human brain in the following two ways:
1.	A neural network acquires knowledge through learning.
2.	A neural network's knowledge is stored within inter-neuron connection strengths known as synaptic weights.
The true power and advantage of neural networks lies in their ability to represent both linear and non-linear relationships and in their ability to learn these relationships directly from the data being modeled.

An analytics model based on Neural Networks was built using Microsoft's Azure services. The screenshot of the algorithm is shown:

![](https://lh4.googleusercontent.com/L1BDKAhJNyDo4KVWRp_YlQApOWVqHd2MAJ9Uweyo47cbQb-tM4lru3frDR79bdQAamvdVqD_Mgc2NPM=w1366-h648-rw)

The results obtained when this Algorithm was run on historical database of the stocks of APPL (Apple Inc.) from last 20 years are as shown below. This database contained the daily stock movement with many indices. We considered only the Opening, Closing, High and Low values of the stock to make our calculations.

![](https://lh5.googleusercontent.com/yB3AdokxNtiefV1hPVGV10ph7RoXj7AQ4-FQO5mLJkTKHFuB6e4EpwGRE_O2l_U0Th3DkiTzoQHD1w4=w1366-h648)

From the analysis of the results that out algorithm generated, we can very well see that the frequency of lowest error is maximum. This cements the fact that Neural Networks can be used as a reliable Algorithm to predict future stock prices.

### LINEAR REGRESSION ANALYTICS MODEL
Linear regression is a statistical procedure for predicting the value of a dependent variable from an independent variable when the relationship between the variables can be described by a linear model.
A linear regression equation can be written as Yp= mX + b, where Yp is the predicted value of the dependent variable, m is the slope of the regression line, and b is the Y-intercept of the regression line. 

In statistics, linear regression is a method of estimating the conditional expected value of one variable y given the values of some other variable or variables x. The variable of interest, y, is conventionally called the "dependent variable". The terms "endogenous variable" and "output variable" are also used. The other variables x are called the "independent variables". The terms "exogenous variables" and "input variables" are also used. The dependent and independent variables may be scalars or vectors. If the independent variable is a vector, one speaks of multiple linear regression.

We again built an analytics model, but this time it was based on Linear Regression. We made use of Microsoft's Azure services. The screenshot of the algorithm is shown:

![](https://lh5.googleusercontent.com/knwwFuN_Jvce1GpzRSjMQvCh4dvzOt4Al8ZCevUvhnIpYxS4Tg8aSD4dDq7EGQp9Onamx2EwQX-3y_8=w1366-h648)

Again the same dataset as used for Neural Networks model was used, with the following results:

![](https://lh6.googleusercontent.com/1XnOFUorZ2LR-E66jOnKeAV2yeCMspTIBCT8BMBWnwo3rmWsXickMnC5RLa2qS9OA60f9HNNUT9U4g8=w1366-h648)

From the analysis of results, we observe that the frequency of higher errors is more in this model. Hence, not as reliable as Neural Network Model.
 
# ANALYSIS DONE ON REAL-TIME DATA
### SENTIMENT ANALYSIS
Sentiment Analysis can be performed on the news that is sourced using HPE HavenOnDemand. This news is sourced from all over the Internet giving investors the required news. Also, sentiment analysis is done on each news item which tells whether a news in positive or negative. Based on all news items an overall score is given which gives the overall sentiment of the stock. Thus, investors can merely copy the sentiment of a stock in the market and base their investment decisions.

Sentiment Analysis also known as opinion mining, is the process of determining whether a piece of writing is positive, negative or neutral. It’s also known as opinion mining. A common use case for this technology is to discover how people feel about a particular topic.

The sentiment analysis algorithm built on MS Azure:

![](https://lh5.googleusercontent.com/sx-kdWqVjRVC_RB93HqCl5v2kTEaqivWgboUMGWu8PRSZMoI38CZNyG28xZQVFRjafeaKaBAO_BVyOE=w1366-h648-rw)

The following image is an example of a search made on our application:

![](https://lh5.googleusercontent.com/PAonnpa2xIQpV3NcijJ43lH1VntF-0Ded6PLT5FgaSLx6_xRiDoEHXRa17y_R5jgOGVfRUJpIMCBSxQ=w1366-h648-rw)

### NOTE:
The size of the data that we used in most of our calculations include the last 20 years of daily stock data of all the stocks that are listed. The metadata is:

![](https://lh4.googleusercontent.com/V5Menvfl-j_wYEdWjDIo4LFl6Rhlxg4WL2aUkrowGvoWBayYRZQQsg708kS8ByUJnyUYRZdLP_psxQ0=w1366-h648)
 
