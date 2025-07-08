Here are the few Suggestion if i would have time then i would implement it.
1- Implementing cacheing for getting list of cities.
2- Rate limiting the api calls and throteling it
3- Implement List api of cities for my usage to get ID's although i have create service for it to check and get id's but not the endpoint
4- Implement retry and timeout functionality
5- write test cases for my api using unit test or PestPhp

Overall Imeplementation:
I have used Servie based architecture in this test 
make Service for Http Client named as CrmClient and for SubscriberService,EnquiryService and ListService.
Use constuctor based dependency injection rather than using field injection.
calling only that particular service which i wanna use. Follow the SOLID Principle in this test.
Define BaseUrl and Token in env file and config file for usage. Create a crm.php file for the configuration of baseurl and token.
Make Request validation for the data comming from the request and custom messages for the request.

Endpoints are define in the routes folder routes/api file.
I have made seperate controller for each functionality. present in App/Http/Controller/API folder.
CRMClient Service is for calling get and post api rather than using whole http client code make it resuable in service and use its method.