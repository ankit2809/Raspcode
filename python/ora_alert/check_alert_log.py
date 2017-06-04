import sys
# define main function to read, cleanse and write
def main(ifile, ofile):
    lines = [line.rstrip('\n') for line in open(ifile)]
    lines = list(line for line in lines if line)
    alerts = ['']*30000
    alerts[0]=lines[0]
    j=1
    days= 'Mon','Tue','Wed','Thu','Fri','Sat','Sun'
    for i in range(1,len(lines)):
        words= lines[i].split(' ')
        if (int(words[0][:3] in days) & int(alerts[j - 1].split(' ')[0][:3] in days)):
            alerts[j - 1] = lines[i]
        elif (words[0][:3] not in days):
            for word in words:
                if ("ORA-" in word):
                    alerts[j] = lines[i]
                    j = j + 1
        elif (int(words[0][:3] in days)):
            alerts[j] = lines[i]
            j = j + 1
# Write the formatted and filtered content to output file
    foo = open(ofile,'w')
    foo.writelines(["%s\n" % x  for x in alerts if x])
    print("Output file written as " + ofile)
    foo.close()
if __name__=='__main__':
    sys.exit(main(sys.argv[1], sys.argv[2]))