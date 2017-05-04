import tweepy
import sys
import json
import time

#get your own twitter credentials at dev.twitter.com
consumer_key = "Z0Tc4aEGSREdjdTIDJrhZpZCz"
consumer_secret = "W6zq31bATgnPMl24EJwVQcf4s95girUefjAcG8JMfA3LYQ9ldd"
access_token = "2426267696-GjOXLhAsJzgmw2JZvR12PDAE2dZMhBVLWF7t4Oh"
access_token_secret = "msTo2T0Z0vsws5BArWqHmGqJ6xpDsk1HZKw8bCRqzHehs"

auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
auth.set_access_token(access_token, access_token_secret)
api = tweepy.API(auth)
find_tweet = api.search(q="frenchelection")
for i in find_tweet:
	print i.text