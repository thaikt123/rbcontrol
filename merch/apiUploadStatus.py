# 
# Python auto _POST data through Api 
# Using Request _POST <php> to insert Data Merch to DB Server
#...


#   ---------- NOTICE: ----------------
#   DATA IN EXCEL MUST BE NOT NONE|| BLANK
# 
# 
# 

import requests
import openpyxl


def data_isUpload(asin_sku):

    data = {

        'is_upload' = '1',
        'asin' = 'asin_sku',


    }

    return data

def makeRequest():

    data = data_isUpload(asin)

    # Request post to Push Data to API-PHP
    response = requests.post('http://localhost/controlpro/merch/api_update_upload_status.php', data=data)

    # Check the response status
    if response.status_code == 200:
        print("Data inserted successfully!")

    else:
        print("Error inserting data:", response.text)
    
#-------------------------- MAIN METHOD ------------------
#-------------------------------------------------------
# Get Asin to put data
# call Method ... 
#.... Call this method from another 'file.py' ==> USING IMPORT...
    

