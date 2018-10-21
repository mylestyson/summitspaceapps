import os
import subprocess

def main():
    outFolder = "artic-data"
    inPath = "antartic-data"
    for file in os.listdir(inPath):
        if ".HDFEOS" not in file:
            continue
        filename = file.strip('.HDFEOS')
        #subprocess.call(["ls", "-l"])

        #hdp dumpsds -i 2 -s -x -d -c -o "C:\Users\OEM\Downloads\test\out.csv" "C:\Users\OEM\Downloads\test\NISE_SSMISF17_20150925.HDFEOS"
        outPath = outFolder + "\\" + filename + ".csv"
        imagePath = inPath + "\\" + filename + ".HDFEOS"

        subprocess.call('hdp dumpsds -i 0 -s -x -d -c -o ' + outPath + " " + imagePath, shell=True)
        #subprocess.call(['powershell','hdp dumpsds -i 2 -s -x -d -c -o "out.csv" "NISE_SSMISF17_20170430.HDFEOS"','C:\\Users\\OEM\\Downloads'])
        #print(filename)
if __name__ == '__main__':
    main()
