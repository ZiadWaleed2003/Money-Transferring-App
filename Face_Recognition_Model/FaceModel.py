import os 
import face_recognition
import cv2
import numpy as np
import glob

    

def imgPreProcessing(img_path):

    print(img_path)
    
    img = cv2.imread(img_path)
    resize_img = 0.25 


    gray_scaled_img = cv2.cvtColor(img , cv2.COLOR_BGR2RGB)

    resized_img = cv2.resize(gray_scaled_img, (0, 0), fx = resize_img, fy = resize_img)

    return resized_img



def getFaceEmbds(img_path):

    img = imgPreProcessing(img_path)

    face_embeddings = face_recognition.face_encodings(img)[0]

    return (face_embeddings.tolist())
    




def compareFaces(new_face , known_faces , users_id ):
     
    new_img = imgPreProcessing(new_face)
    
    
    face_locations = face_recognition.face_locations(new_img)
    face_encodings = face_recognition.face_encodings(new_img, face_locations)

    face_names = []
    for face_encoding in face_encodings:
        # See if the face is a match for the known face(s)
        matches = face_recognition.compare_faces(known_faces, face_encoding)
        id = "Unknown"

        # # # If a match was found in known_face_encodings, just use the first one.
        # if True in matches:
        #     first_match_index = matches.index(True)
        #     name = self.face_names[first_match_index]

        # Or instead, use the known face with the smallest distance to the new face
        face_distances = face_recognition.face_distance(known_faces, face_encoding)
        best_match_index = np.argmin(face_distances)
        if matches[best_match_index]:
            id = users_id[best_match_index]

        face_names.append(id)

   
    return face_names

        
