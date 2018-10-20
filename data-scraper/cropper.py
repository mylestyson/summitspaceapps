import os
import subprocess
import csv
import pandas as pd


def main():
   inPath = "med"
   outPath = "out"
   names = []
   for file in os.listdir(inPath):
      with open(os.path.join(inPath, file),'r') as csv_file:
         csv_reader = csv.reader(csv_file, delimiter=' ')
         fileLines = []
         lines = []
         for row in csv_reader:
            fileLines.append(row)
         for i in range (220,510):
            lines.append(fileLines[i][220:510])
         df = pd.DataFrame(lines)
         df.to_csv(outPath + "\\" + file, index = False)
         #input("derp")


if __name__ == '__main__':
   main()
