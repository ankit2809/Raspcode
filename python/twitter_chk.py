import tweepy
import sys
import json
import time

#get your own twitter credentials at dev.twitter.com
consumer_key = "xxxxxx"
consumer_secret = "xxxxxx"
access_token = "xxxxxx"
access_token_secret = "xxxxxx"

auth = tweepy.OAuthHandler(consumer_key, consumer_secret)
auth.set_access_token(access_token, access_token_secret)
api = tweepy.API(auth)
find_tweet = api.search(q="frenchelection")
for i in find_tweet:
	print i.text
