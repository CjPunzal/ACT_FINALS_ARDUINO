#include <ACS712.h>

/*Pump System by Christian James D. Punzal*/
#include "ACS712.h"
#include <Servo.h>
#include <LiquidCrystal_I2C.h>
LiquidCrystal_I2C lcd(0x27, 16, 2);
ACS712 sensor(ACS712_05B, A15);
Servo Servo1;

#define relayPin 7
#define servoPin 6

void setup() {
  Servo1.attach(servoPin);
  Serial.begin(9600);
  sensor.calibrate();
  lcd.init();
  lcd.backlight();
  pinMode(relayPin, OUTPUT);
}
void loop() {
  float I = sensor.getCurrentAC();
if (I < 9.00){
  digitalWrite(relayPin,HIGH);
  Servo1.write(20);
  /*PUMP POWER UNSTABLE*/
  lcd.setCursor(0, 0);
  lcd.print("# PS2 STOPPED! #");
  lcd.setCursor(0, 1);
  lcd.print("# PS2 STOPPED! #");
  delay (500);
  }else{
  digitalWrite(relayPin, LOW);
  Servo1.write(110);
  /*PUMP POWER STABLE*/
  lcd.setCursor(0, 0);
  lcd.print("# PS NORMAL!! #");
  lcd.setCursor(0, 1);
  lcd.print("# PS NORMAL!! #");
  delay(500); 
  }
}
