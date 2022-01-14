#include <Wire.h>
#include <Adafruit_MLX90614.h>
#include <SoftwareSerial.h>
#include <WiFi.h>
#include <PubSubClient.h>
#include <ArduinoJson.h>
//#include <KRcode.h>

Adafruit_MLX90614 mlx = Adafruit_MLX90614();
float kalibmlx;
SoftwareSerial myserial(17,16);
String kode;

const char* ssid = "SAVVI_AP+";
const char* password = "savviseti78910";
const char* mqtt_server = "broker.hivemq.com";
WiFiClient espClient;
PubSubClient client(espClient);
long lastMsg = 0;
char msg[50];
int value = 0;
const int id_absen = 001;

unsigned long interval = 1000;
unsigned long waktuAwal = 0;

void setup() {
  // put your setup code here, to run once:
 Serial.begin(9600);
  Serial.setTimeout(250);
  mlx.begin();
  myserial.begin(9600);
  myserial.setTimeout(100);
  setup_wifi();
  client.setServer(mqtt_server, 1883);
  client.setCallback(callback);
}

void loop() {
  unsigned long waktuSekarang = millis();
 
   if (waktuSekarang - waktuAwal >= interval) {
    while (myserial.available() > 0) {
    kode = myserial.readString();
    //Serial.println(kode);
  }
  
      //if (kode.readString()){
        kalibmlx = mlx.readObjectTempC() + 1;
     // }
    
    //if (myserial.readString()>){
    StaticJsonBuffer<300> JSONbuffer;
    JsonObject& JSONencoder = JSONbuffer.createObject();
    
    JSONencoder["ta"] = "Absensi";
    JsonArray& values = JSONencoder.createNestedArray("values");
    values.add(id_absen);
    values.add(kode);
    values.add(kalibmlx);
     char JSONmessageBuffer[100];
     JSONencoder.printTo(JSONmessageBuffer, sizeof(JSONmessageBuffer));
     Serial.println("Sending message to MQTT topic..");
     Serial.println(JSONmessageBuffer);
     client.publish("lrt/tdr/data/absen", JSONmessageBuffer);
      
      //} 
      kode="";
    
     if (!client.connected()) {
      reconnect();
    }
    client.loop();
    waktuAwal = waktuSekarang;
   }
}

void setup_wifi() {
  delay(10);
  // We start by connecting to a WiFi network
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

void callback(char* topic, byte* payload, unsigned int length) {
  Serial.print("Message arrived [");
  Serial.print(topic);
  Serial.print("] ");
  for (char i = 0; i < length; i++) {
    Serial.print((char)payload[i]);
  }


  // Switch on the GPIO if an 1 was received as first character
  if ((char)payload[0] == '1') {
    digitalWrite(12, HIGH);   // Turn the LED on (Note that LOW is the voltage level
  }
  if ((char)payload[0] == '0') {
    digitalWrite(12, LOW);  // Turn the LED off by making the voltage HIGH
  }
}

void reconnect() {
  while (!client.connected()) {
    Serial.print("Attempting MQTT connection...");
    // Attempt to connect
    if (client.connect("ESP32DEVClient")) {
      Serial.println("connected");

      client.subscribe("ESP32DEVBOARD"); //TOPIC
    } else {
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println(" try again in 5 seconds");
      delay(5000);
    }
  }
}
