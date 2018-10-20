##import resources
import urllib
import urllib.request
from urllib.parse import urlparse
import os

def main():
    getFiles()

def getFiles():
    ## Reading in links
    path = "HDFEOS-urls.txt"
    file = open(path,"r")
    urls = file.readlines()


    # https://n5eil01u.ecs.nsidc.org/DP5/OTHR/NISE.004/2017.04.30/NISE_SSMISF17_20170430.HDFEOS

    for url in urls:
        splits = url.split("/")
        filename = splits[len(splits) - 1]
        print(filename)
        urllib.request.urlretrieve(url, 'data/' + filename)



if __name__ == '__main__':
    main()
