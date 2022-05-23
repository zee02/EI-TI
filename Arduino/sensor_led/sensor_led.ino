//biblioteca de Wi-fi
#include <WiFi101.h>
//biblioteca para pedidos HTTP
#include <ArduinoHttpClient.h>
// iniciar a biblioteca de cliente Wi-Fi e HttpClient
WiFiClient clienteWifi;

int porta = 7;
String ssid = "labs";
String pass = "robot1cA!ESTG";
String IP = "10.20.228.234"; // Alterar para o endereço IP do Servidor com a API
String resourcePost = "/EI-TI/api/api.php"; // Alterar para o recurso da sua API, se necessário
String contentType = "application/x-www-form-urlencoded"; // Formato de dados do pedido HTTP
String resourceGetTemperatura = "/EI-TI/api/api.php?nome=temperatura";
HttpClient clienteHTTP = HttpClient(clienteWifi, IP, 80); // instância cliente que permite realizar pedidos HTTP
  
void setup() {
  Serial.begin (9600);
  while (!Serial);
  pinMode(7, INPUT);
  ligarWifi(ssid,pass);
}

void loop() {
  delay(500);
  float resultadoTemperatura = enviarGet(resourceGetTemperatura);
  Serial.println(resultadoTemperatura);

  if(resultadoTemperatura > 20){
    Serial.println("Vou ligar o led...");
    digitalWrite(LED_BUILTIN, HIGH);
    String dados = "valor=1&nome=led";
    enviarPost(resourcePost, contentType, dados);
  } else {
    Serial.println("Vou desligar o led...");
    digitalWrite(LED_BUILTIN, LOW);
    String dados = "valor=0&nome=led";
    enviarPost(resourcePost, contentType, dados);
  }
}



void ligarWifi(String ssid, String pass){
  Serial.println("Irá ligar-se à rede: ");
  Serial.println(ssid);
  Serial.println("\n");
  WiFi.begin(ssid, pass);


  while(WiFi.status() != WL_CONNECTED){
    Serial.println(".");
    delay(500);
    
  }
  Serial.println("Ligado com sucesso ao WiFi\n");

  Serial.println("Detalhes da rede: ");
  IPAddress ip = WiFi.localIP();
  Serial.println(ip);
  Serial.println("\n");
  IPAddress mask = WiFi.subnetMask();
  Serial.println("Mascara de Rede: ");
  Serial.println(mask);
  Serial.println("\n");
  IPAddress gateway = WiFi.gatewayIP();
  Serial.println("IP do gateway: ");
  Serial.println(gateway);
  Serial.println("\n");
  long rssi = WiFi.RSSI();
  Serial.println("Potência do Sinal: ");
  Serial.println(rssi);
  Serial.println("\n");
  
}

void enviarPost(String resource, String contentType, String dados){
   clienteHTTP.post(resource, contentType, dados);

   Serial.println(clienteHTTP.responseStatusCode());
   Serial.println(clienteHTTP.responseBody());
}

float enviarGet(String resourceGetTemperatura){
  clienteHTTP.get(resourceGetTemperatura);
  float resultado = clienteHTTP.responseBody().toFloat();
  return resultado;
}
