//----------------------------------------Include the NodeMCU ESP8266 Library
//----------------------------------------see here: https://www.youtube.com/watch?v=8jMr94B8iN0 to add NodeMCU ESP8266 library and board
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClient.h>
//----------------------------------------

#define ON_Board_LED D0 // On Board LED

int OutsideLight = D1;  // Pin for Outside LED

//----------------------------------------SSID and Password of your WiFi router.
const char* ssid = "TUF GAMING~";
const char* password = "calvinkleinerica2256.";
//----------------------------------------

//----------------------------------------Web Server address / IPv4
/// If using IPv4, press Windows key + R then type cmd, then type ipconfig (If using Windows OS).
// String host_or_IPv4 = "http://Your_Host_or_IP";

String host_or_IPv4 = "http://192.168.1.3/home_hub/";
String Destination = "";
String URL_Server = "";
//----------------------------------------

//----------------------------------------
String getData = "";
String postData = "";
String payloadGet = "";
String payloadSend = "";
//----------------------------------------

//----------------------------------------
WiFiClient client;
//----------------------------------------
void setup() {
  // put your setup code here, to run once:
  Serial.begin(115200);
  delay(500);

  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password); //--> Connect to your WiFi router
  Serial.println("");

  pinMode(OutsideLight, OUTPUT); //--> On Board Solenoid Lock Direction output

  //----------------------------------------Wait for connection
  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    //----------------------------------------Make the On Board Flashing LED on the process of connecting to the wifi router.
    digitalWrite(ON_Board_LED, LOW);
    delay(250);
    digitalWrite(ON_Board_LED, HIGH);
    delay(250);
    //----------------------------------------
  }
  //----------------------------------------
  digitalWrite(ON_Board_LED, HIGH);
  //----------------------------------------If successfully connected to the wifi router, the IP Address that will be visited is displayed in the serial monitor
  Serial.println("");
  Serial.print("Successfully connected to : ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
  Serial.println();
  //----------------------------------------

  delay(2000);
}

void loop() {
  // put your main code here, to run repeatedly:
  HTTPClient http; //--> Declare object of class HTTPClient
  
  //----------------------------------------
  // From my tests, after uploading the program code, the connection for the first time may fail (-1). But the next connection is fine/runs smoothly.
  //----------------------------------------
  
  //----------------------------------------Getting Data from MySQL Database
  int id = 0; //--> ID in Database 
  getData = "ID=" + String(id);
  Destination = "getLED.php";
  URL_Server = host_or_IPv4 + Destination;
  Serial.println("----------------Connect to Server-----------------");
  Serial.println("Get LED Status from Server or Database");
  Serial.print("Request Link : ");
  Serial.println(URL_Server);
  http.begin(client, URL_Server); //--> Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header
  int httpCodeGet = http.POST(getData); //--> Send the request
  payloadGet = http.getString(); //--> Get the response payload from server
  Serial.print("Response Code : "); //--> If Response Code = 200 means Successful connection, if -1 means connection failed. For more information see here : https://en.wikipedia.org/wiki/List_of_HTTP_status_codes
  Serial.println(httpCodeGet); //--> Print HTTP return code
  Serial.print("Returned data from Server : ");
  Serial.println(payloadGet); //--> Print request response payload
  
  if (payloadGet == "1" ){
    digitalWrite(OutsideLight, HIGH); //--> Turn on Lights on Living Room
  }else{
    digitalWrite(OutsideLight, LOW); //--> Turn on Lights on Living Room
  }
  
  //----------------------------------------
  
  
  Serial.println("----------------Closing Connection----------------");
  http.end(); //--> Close connection
  Serial.println();
  Serial.println("Please wait 4 seconds for the next connection.");
  Serial.println();
  delay(2000); //--> GET Data at every 10 seconds. From the tests I did, when I used the 5 second delay, the connection was unstable.
}
