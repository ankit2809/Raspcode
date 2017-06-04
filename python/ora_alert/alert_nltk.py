import sys
from nltk.tokenize import word_tokenize
from nltk.probability import FreqDist
from collections import Counter
lines = [line.rstrip('\n') for line in open("out.log")]
lines = list(line for line in lines if line)
fdist = FreqDist()
#fdist = Counter()
for i in range(1,len(lines)):
        if (lines[i][:3]=='ORA'):
        	fdist.update([word_tokenize(lines[i])[0]])
print(fdist.most_common(50))