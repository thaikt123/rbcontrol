# 
# Python auto post data through Api 
#
import requests

# Define the data to be sent
data = {
    'user': 'user6',
    'field2': 'http://test467',
    'field3': 'test4',
    'field4': 'test4',
    'field5': 'test4',
}

# Send the POST request to the API endpoint
response = requests.post('http://localhost/controlpro/insert_data.php', data=data)

# Check the response status
if response.status_code == 200:
    print("Data inserted successfully!")
else:
    print("Error inserting data:", response.text)