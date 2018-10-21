from PIL import Image
import csv
import time
import os

width = 721
height = 721

brightness = 255 / 100

img = Image.new('RGB', (width, height))


count = 0

def sorted_dir(folder):
    def getmtime(name):
        path = os.path.join(folder, name)
        return os.path.getmtime(path)

    return sorted(os.listdir(folder), key=getmtime, reverse=True)

def csvToImage(file):
    global count
    i = 0;
    for row in open(file):
        i = i + 1;
        csv_row = row.split() #returns a list ["1","50","60"]
        j=0;
        for col in csv_row:
            j = j + 1;
            val = int(col)
            if (val>0 and val<=100):
                c = int(val)
                color = (c,c,c)
                img.putpixel( (i,j), color )
    img.save("images2/" + str(count) + ".png")
    count = count + 1
            

for filename in os.listdir(os.getcwd()+"/data"):
    if filename.endswith(".csv"): 
        csvToImage("data/"+filename)


        


        
