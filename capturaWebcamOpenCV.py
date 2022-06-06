import cv2 as cv
while True:
    try:
        camera = cv.VideoCapture(0)
        ret, image = camera.read()
        print ("Resultado da Camera=" + str(ret))
        cv.waitKey(5000)
        cv.imwrite('webcam.jpg', image)
        cv.destroyAllWindows()
    except:
        print("An exception occurred")