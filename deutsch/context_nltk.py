# encoding=utf8  
import nltk
import sys  
reload(sys)  
sys.setdefaultencoding('utf8')
from nltk.tokenize import word_tokenize, sent_tokenize
fr = open("mycontext.txt", "r")
fw = open("mycontext_temp.txt", "w+a")
subtitle = fr.read()
satze = sent_tokenize(subtitle)
for sent in satze:
	fw.write(sent)
	fw.write("\n")
fr.close()
fw.close()