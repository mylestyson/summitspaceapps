import os
import csv
import numpy as np

def main():
    filePath = os.path.join("antartic-data")

    for file in os.listdir(filePath):
        if file != '.gitignore':
            with open(os.path.join(filePath,file),'r') as f:
                data = list(csv.reader(f,delimiter=' '))
                data = [data[i][:721] for i in range(721)]
            data = np.array(data,dtype=np.uint8)

            ##sum where less than 101 and greater than 0
            print(np.sum(data))

            ##average where less than 101 and greater than 0


if __name__ == '__main__':
   main()
