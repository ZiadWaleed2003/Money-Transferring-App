from flask import Flask , request , jsonify
from FaceModel import getFaceEmbds
from FaceModel import compareFaces as cf
from werkzeug.utils import secure_filename
import os
import base64

app = Flask(__name__)


UPLOAD_FOLDER = r"D:\FaceRecognitionModel\Upload_folder"

# ALLOWED_EXTENSIONS = set(['txt' , 'pdf' , 'png' , 'jpg','jpeg','gif'])


# def allowed_file(filename):

#     return '.' in filename and filename.rsplit('.',1)[1].lower() in ALLOWED_EXTENSIONS


app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER


def upload_image(file , file_name):

    saved_path = None 

    if file_name == '':
        return jsonify({"error" : "no file selected"}) ,400
    
    if file :

        filename = file_name
        
        saved_path = os.path.join(app.config['UPLOAD_FOLDER'] , filename)
        
        with open(os.path.join("Upload_folder\\", filename), 'wb') as f:
            f.write(file)



    original_path = saved_path

    # Split the path at the first occurrence of "Upload_folder\"
    split_path = original_path.split("\\Upload_folder\\", 1)

    # If there's a path after the delimiter, prepend "Upload_folder\" to it
    if len(split_path) > 1:
        new_path = "Upload_folder\\" + split_path[1]
    else:
        # Handle the case where "Upload_folder\" is not found
        new_path = original_path

    print(new_path)


    return new_path

        



@app.route("/getFaceEmbeddings", methods=['POST'])
def getFaceEmbeddings():

    if 'file' not in request.json:
        return jsonify({"error" : "media not provided"}) , 400
    
    file = request.json['file']
    filename = request.json['filename']

    image = base64.b64decode(file)

    img_path = upload_image(image , filename)

    face_embd = getFaceEmbds(img_path)

    if len(face_embd) != 0 : 
        
        os.remove(img_path)

        return jsonify({ "response" : face_embd })
    
    else:
        return jsonify({"response" : "Failed to get the embeddings"}) , 404
    





@app.route("/compareFaces" , methods = ['POST'])
def compareFaces():
    
    if 'file' not in request.json:
        return jsonify({"error" : "media not provided"}) , 400
    
    file = request.json['file']
    filename = request.json['filename']
    image = base64.b64decode(file)

    img_path = upload_image(image , filename)


    # Validate required data from JSON
    if 'known_faces' not in request.json or 'id' not in request.json:
        return jsonify({"error": "Missing 'known_faces' or 'ID' in JSON data"}), 400

    # Access non_faces (2D array) and ID (1D array) from JSON
    known_faces = request.json['known_faces']
    id_array = request.json['id']


    id_array = convertIdtoList(id_array)

    # print(id_array)

    # print(known_faces)


    result = cf(img_path ,known_faces , id_array)

   
    os.remove(img_path)

    print(result)

    return jsonify({ "response" : result }),200
    




def convertIdtoList(ids):

    converted_id = []

    for id in ids :

        i = id['user_id']

        converted_id.append(int(i))

    return converted_id
        





if __name__ == "__main__": 
    app.run(debug=True , port=5000)  # Run the development server