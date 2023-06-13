import requests

# Define the condition
condition_value = 'user6'  # Replace with the actual condition value

# Send the GET request to the API endpoint with the condition as a query parameter
response = requests.get('http://localhost/controlpro/get_data.php?condition=' + condition_value)

# Check the response status
if response.status_code == 200:
    data = response.json()
    for item in data:
        print(item)  # Perform further processing with the fetched data
else:
    print("Error retrieving data:", response.text)