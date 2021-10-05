import cv2, os

#pip install opencv-python #for installing opencv package
directory = os.path.dirname(os.path.realpath(__file__))
os.chdir(directory) #changing directory to script folder
filename = 'savedImage.jpg' #picture to convert in same folder as script

#reading image from the same folder of script
image1 = cv2.imread("example.jpg") #filename example.jpg
resize = image1

#converting BGR image to grayscale
gray_image = cv2.cvtColor(resize, cv2.COLOR_BGR2GRAY)

#image inversion
inverted_image = 255 - gray_image

blurred = cv2.GaussianBlur(inverted_image, (21, 21), 0)
inverted_blurred = 255 - blurred
pencil_sketch = cv2.divide(gray_image, inverted_blurred, scale=256.0)

#cv2.imshow("Original Image", resize) #display source to screen
#cv2.imshow("Pencil Sketch of Cat", pencil_sketch) #display result to screen
cv2.imwrite(filename, pencil_sketch) #saving sketch image to script folder
cv2.waitKey(0)
