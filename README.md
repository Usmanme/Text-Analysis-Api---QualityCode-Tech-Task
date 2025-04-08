Qualitycode Task Text Analysis API

## Project Structure

Controller: The main logic of text analysis is handled in the `TextAnalysisController`. It takes a text input and processes it to return:
  Total Words : The total number of words in the input text.
  Unique Words : The number of unique words in the input text.
  Most Common Word : The word that appears most frequently, along with its count.


## How to Run the Project

Requirements:
- **PHP** (Recommended version: 7.4 or above)
- **Laravel 8 or above**
- **Composer** (for dependency management)
- **MySQL** (for database, if required)

### Steps to Run the API:

1.  Clone the Repository

2.  Install Dependencies:
   
    composer install

3. Set Up Environment:
   - Copy `.env.example` to `.env` to create the environment file

4. Generate the Application Key:
     php artisan key:generate
   
5. Run the Application:
     php artisan serve

6. Test the API:

Using Postman write this in url http://localhost:8000/api/text-analysis as a POST request and in Body tag using raw as a JSON data 
{
  "text": "Hello world! Hello again. World is big, and hello to everyone."
}
paste this and hit send.

7. Run Tests:
     php artisan test


