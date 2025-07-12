from flask import Flask, request, jsonify
from flask_cors import CORS
import joblib
import numpy as np
import json
import pandas as pd

file_path = r"D:\mwit-project-M.5\dataset\MIT-BIH Arrhythmia Database.csv"

app = Flask(__name__)
CORS(app)

try:
    data = pd.read_csv(file_path)
    print('Load Data Successfully')
except Exception as e:
    print(f"Failed to load data: {e}")
    
@app.route('/random-data', methods=['POST'])
def randomData():
    print('test')