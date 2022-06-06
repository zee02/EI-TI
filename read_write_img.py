import cv2 as cv

img = cv.imread('opencv_image.png', 0)
cv.imshow('Imagem', img)
cv.waitKey(5000)
cv.waitKey(0) & 0xFF == ord('s')
cv.imwrite('opencv_image_gray.png', img)
cv.destroyAllWindows()
