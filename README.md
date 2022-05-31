<h1 dir="auto" data-sourcepos="1:1-1:23">Coding Challenge</h1>
<p dir="auto" data-sourcepos="2:1-2:62">Presentation of output response based on an input request. I tried to use both RAW data and FORM data in input response </p>
<h2 dir="auto" data-sourcepos="26:1-26:15"> <a aria-hidden="true" href="#installation" id="user-content-installation"></a>Installation</h2>
<ul dir="auto" data-sourcepos="28:1-34:78">
  <li data-sourcepos="28:1-29:1">Clone git from the Repository (git clone <a rel="nofollow noreferrer noopener" href="https://github.com/amitdasece/code-challenge.git">https://github.com/amitdasece/code-challenge.git</a> )</li>
  <li data-sourcepos="30:1-30:17">composer update</li>
  <li data-sourcepos="31:1-31:70">Rename .env.example to .env.</li>
</ul>
<div>
  <pre lang="plaintext" data-sourcepos="35:1-40:3"><span lang="plaintext" id="LC1">$ </span><span lang="plaintext" id="LC4"> php artisan serve</span></pre>
</div>
<ul dir="auto" data-sourcepos="41:1-42:0">
  <li data-sourcepos="41:1-42:0">RUN <a rel="nofollow noreferrer noopener" href="http://127.0.0.1:8000/api/codeChallenge">http://127.0.0.1:8000/api/V1/codeChallenge</a> in your POSTMAN (when input is in JSON RAW data as given in the challenge) </li>
  <li>RUN <a rel="nofollow noreferrer noopener" href="http://127.0.0.1:8000/api/codeChallengeFormData">http://127.0.0.1:8000/api/V1/codeChallengeFormData</a> in your POSTMAN (when input is in FORM data with key-value pair) </li>
</ul>

<h2 dir="auto" data-sourcepos="12:1-12:59"> <a aria-hidden="true" href="#read-the-json-data-and-save-it-to-the-database-using-php" id="user-content-read-the-json-data-and-save-it-to-the-database-using-php"></a>Read the json data and display the output using php</h2>
<p dir="auto" data-sourcepos="14:1-15:39">Check these files for code:  </p>
<ul dir="auto" data-sourcepos="145:1-15:39">
<li data-sourcepos="16:1-15:39">app/Http/Controllers/ApiController.php</li>
<li>app/Http/Controllers/CodeController.php</li>
<li>routes/api.php</li>
<li>tests/CreatesApplication.php</li>
<li>tests/Feature/BasicTest.php</li>
</ul>

<h2 dir="auto" data-sourcepos="43:1-43:10"> <a aria-hidden="true" href="#testing" id="user-content-testing"></a>Testing</h2>
<ul dir="auto" data-sourcepos="45:1-46:0">
  <li data-sourcepos="45:1-46:0">phpunit 9.5.10</li>
</ul>
<div>
  <pre lang="plaintext" data-sourcepos="47:1-49:3"><span lang="plaintext" id="LC1">$ php artisan test</span></pre>
</div>
<p dir="auto" data-sourcepos="51:1-51:53">PHPUnit 9.5.10</p>
<p dir="auto" data-sourcepos="53:1-53:28">Time: 32 ms, Memory: 6.00 MB</p>
<p dir="auto" data-sourcepos="55:1-55:26">OK (3 tests, 3 passed)</p>
<p dir="auto" data-sourcepos="55:1-55:26">test_code</p>
<ul dir="auto" data-sourcepos="59:1-62:0">
<li data-sourcepos="55:1-55:26">Output the tests passes with status along with time</li>
<li>Added tests where it checks whether the output has all the required array and keys as defined in the response structure</li>
<li>Added tests where it checks whether the output has all the correct calculations with exact matching as defined in the response structure</li>
</ul>
<p dir="auto" data-sourcepos="57:1-57:91">BasicTest.php is the file to test function.Function name are mentioned in below:</p>
<ul dir="auto" data-sourcepos="59:1-62:0">
  <li data-sourcepos="59:1-59:21">test_code</li>
</ul>
<h2 dir="auto" data-sourcepos="8:1-8:13"> <a aria-hidden="true" href="#screenshot" id="user-content-screenshot"></a>Screenshot</h2>
<p dir="auto" data-sourcepos="10:1-10:103"><a data-canonical-src="https://github.com/amitdasece/code-challenge-test/blob/master/raw_data_postman_request.png" rel="nofollow noreferrer noopener" href="https://github.com/amitdasece/code-challenge-test/blob/master/raw_data_postman_request.png"><img decoding="async" data-canonical-src="https://github.com/amitdasece/code-challenge-test/blob/master/raw_data_postman_request.png" alt="alt text" src="https://github.com/amitdasece/code-challenge-test/blob/master/raw_data_postman_request.png" loading="lazy"></a></p>
<p dir="auto" data-sourcepos="10:1-10:103"><a data-canonical-src="https://github.com/amitdasece/code-challenge-test/blob/master/raw_data_postman_response.png" rel="nofollow noreferrer noopener" href="https://github.com/amitdasece/code-challenge-test/blob/master/raw_data_postman_response.png"><img decoding="async" data-canonical-src="https://github.com/amitdasece/code-challenge-test/blob/master/raw_data_postman_response.png" alt="alt text" src="https://github.com/amitdasece/code-challenge-test/blob/master/raw_data_postman_response.png" loading="lazy"></a></p>
<p dir="auto" data-sourcepos="10:1-10:103"><a data-canonical-src="https://github.com/amitdasece/code-challenge-test/blob/master/form_data_postman_request.png" rel="nofollow noreferrer noopener" href="https://github.com/amitdasece/code-challenge-test/blob/master/form_data_postman_request.png"><img decoding="async" data-canonical-src="https://github.com/amitdasece/code-challenge-test/blob/master/form_data_postman_request.png" alt="alt text" src="https://github.com/amitdasece/code-challenge-test/blob/master/form_data_postman_request.png" loading="lazy"></a></p>
<p dir="auto" data-sourcepos="10:1-10:103"><a data-canonical-src="https://github.com/amitdasece/code-challenge-test/blob/master/form_data_postman_response.png" rel="nofollow noreferrer noopener" href="https://github.com/amitdasece/code-challenge-test/blob/master/form_data_postman_response.png"><img decoding="async" data-canonical-src="https://github.com/amitdasece/code-challenge-test/blob/master/form_data_postman_response.png" alt="alt text" src="https://github.com/amitdasece/code-challenge-test/blob/master/form_data_postman_response.png" loading="lazy"></a></p>
<p dir="auto" data-sourcepos="10:1-10:103"><a data-canonical-src="https://github.com/amitdasece/code-challenge-test/blob/master/unitTesting.png" rel="nofollow noreferrer noopener" href="https://github.com/amitdasece/code-challenge-test/blob/master/unitTesting.png"><img decoding="async" data-canonical-src="https://github.com/amitdasece/code-challenge-test/blob/master/unitTesting.png" alt="alt text" src="https://github.com/amitdasece/code-challenge-test/blob/master/unitTesting.png" loading="lazy"></a></p>

<h2 dir="auto" data-sourcepos="17:1-17:16"> <a aria-hidden="true" href="#prerequisites" id="user-content-prerequisites"></a>Prerequisites</h2>
<ul dir="auto" data-sourcepos="19:1-25:0">
  <li data-sourcepos="19:1-19:9">PHP 8.1</li>
  <li data-sourcepos="21:1-21:10">Composer</li>
  <li data-sourcepos="23:1-25:0">Laravel 9.14.1 </li>
</ul>


<h2 dir="auto" data-sourcepos="63:1-63:10"> <a aria-hidden="true" href="#license" id="user-content-license"></a>License</h2>
<p dir="auto" data-sourcepos="65:1-65:117">The Laravel framework is open-sourced software licensed under the <a rel="nofollow noreferrer noopener" href="https://opensource.org/licenses/MIT">MIT license</a>.</p>
