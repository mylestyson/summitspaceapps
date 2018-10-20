##import resources
import urllib
import urllib.request
from urllib.parse import urlparse
import os
import requests
from http.cookiejar import CookieJar
from urllib import parse

path = "HDFEOS-urls.txt"
settingsPath = "settings.txt"

def main():
    getFiles()

def getFiles():
    ## Reading in links
    file = open(path,"r")
    urls = file.readlines()
    file.close()

    authenticate()

    # https://n5eil01u.ecs.nsidc.org/DP5/OTHR/NISE.004/2017.04.30/NISE_SSMISF17_20170430.HDFEOS

    for url in urls:
        splits = url.split("/")
        filename = splits[len(splits) - 1]
        filename = filename.strip('\n')
        #print(filename)

        ## download image
        fullfilename = os.path.join('data/', filename)
        urllib.request.urlretrieve(url, fullfilename)


def authenticate():

    authentication = open(settingsPath,"r")
    authContent = authentication.readlines()
    authentication.close()

    username = authContent[0].strip('\n')
    password = authContent[1].strip('\n')


    # https://wiki.earthdata.nasa.gov/display/EL/How+To+Access+Data+With+Python

    password_manager = urllib.request.HTTPPasswordMgrWithDefaultRealm()
    password_manager.add_password(None, "https://urs.earthdata.nasa.gov", username, password)

    cookie_jar = CookieJar()

    opener = urllib.request.build_opener(
    urllib.request.HTTPBasicAuthHandler(password_manager),
    #urllib2.HTTPHandler(debuglevel=1),    # Uncomment these two lines to see
    #urllib2.HTTPSHandler(debuglevel=1),   # details of the requests/responses
    urllib.request.HTTPCookieProcessor(cookie_jar))
    urllib.request.install_opener(opener)


if __name__ == '__main__':
    main()
