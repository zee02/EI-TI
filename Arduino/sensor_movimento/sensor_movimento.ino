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
HttpClient clienteHTTP = HttpClient(clienteWifi, IP, 80); // instância cliente que permite realizar pedidos HTTP
  
void setup() {
  Serial.begin (9600);
  while (!Serial);
  pinMode(7, INPUT);
  ligarWifi(ssid,pass);
}

void loop() {
  detetarMovimento(porta);
  delay(1000);

}

void detetarMovimento(int pinSensor){
    int valores = digitalRead(pinSensor);
    
    if(valores == 0) {
      Serial.println("Movimento não detetado");
    } else {
       Serial.println("Movimento detetado");
       String dadosMovimento = "valor=1&nome=movimento&hora=2022/05/05 14:15";
       enviarPost(resourcePost, contentType, dadosMovimento);
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
