from flask import Flask, request, jsonify
from flask_cors import CORS
import joblib
import numpy as np
import json



app = Flask(__name__)
CORS(app)

# Load your model
model_path = r'C:\xampp\htdocs\ECGWebApp\server\model\xgboost_model.pkl'
try:
    model = joblib.load(model_path)
    print("Model loaded successfully")
except Exception as e:
    print(f"Failed to load model: {e}")

@app.route('/predict', methods=['POST'])
def predict():
    try:
        if request.is_json:
            data = request.json
            print("Received data:", data)  # Log incoming data

            # Extract the input data
            input_data_str = data.get('input', '{}')
            print("Input data string:", input_data_str)

            try:
                # Parse the JSON string into a dictionary
                input_data = json.loads(input_data_str)
                print("Parsed input data:", input_data)
            except json.JSONDecodeError:
                return jsonify({'error': 'Invalid JSON format in input'}), 400

            # Define the expected feature names
            feature_names = ['0_pre-RR', '0_post-RR', '0_pPeak', '0_tPeak', '0_rPeak', '0_sPeak',
            '0_qPeak', '0_qrs_interval', '0_pq_interval', '0_qt_interval',
            '0_st_interval', '0_qrs_morph0', '0_qrs_morph1', '0_qrs_morph2',
            '0_qrs_morph3', '0_qrs_morph4', '1_pre-RR', '1_post-RR', '1_pPeak',
            '1_tPeak', '1_rPeak', '1_sPeak', '1_qPeak', '1_qrs_interval',
            '1_pq_interval', '1_qt_interval', '1_st_interval', '1_qrs_morph0',
            '1_qrs_morph1', '1_qrs_morph2', '1_qrs_morph3', '1_qrs_morph4']

            # Extract feature values, providing default values for missing features
            input_array = np.array([input_data.get(feature, 0) for feature in feature_names])
            
            # Format input array with commas for debugging
            formatted_input_array = ', '.join(map(str, input_array))
            print(f"Input array: [{formatted_input_array}]")
            print(f"Input array shape: {input_array.shape}")

            # Ensure the input array has the correct shape
            if input_array.shape[0] != 32:
                return jsonify({'error': 'Feature shape mismatch, expected 32 features'}), 400

            # Reshape input array to match the expected shape (1 sample, 32 features)
            input_array = input_array.reshape(1, -1)

            # Make prediction
            prediction = model.predict_proba(input_array)
            print(f"Prediction: {prediction.tolist()}")

            # Convert prediction to a suitable format
            prediction_result = prediction[0].tolist()
            return jsonify({'prediction': prediction_result[0]})
        else:
            return jsonify({'error': 'Request must be JSON'}), 400
    except Exception as e:
        print(f"Error: {e}")
        return jsonify({'error': 'Internal Server Error'}), 500

if __name__ == '__main__':
    app.run(debug=True)
