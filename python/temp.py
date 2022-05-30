import sys
import time
import requests
import simpleaudio.functionchecks as fc


def play_sound(ficheiro):
    wave_obj = fc.WaveObject.from_wave_file(ficheiro)

    play_obj = wave_obj.play()  # tocar o audio

    play_obj.wait_done()  # espera ate o audio terminar

try:
     print("Prima CTRL+C para terminar")
     while True:  # Ciclo para o programa exec sem parar
        print("*** LER temperatura do servidor ***")
        r = requests.get('http://127.0.0.1/EI-TI/api/api.php?nome=temperatura')
        if r.status_code == 200:
            print("Temperatura: ", r.text)
            if r.text > '20':
                print("Temperatura HIGH: ", r.text)
                play_sound("Alarm.wav")
            else:
                print("Temperatura LOW: ", r.text)
        else:
                print("Pedidod HTTP sem sucesso")
        time.sleep(2)
except KeyboardInterrupt:  # caso haja interrupção devido ao CTRL+C
        print("Programa terminado pelo utilizador")
except:  # caso haja um erro qualquer
        print("Ocorreu um erro:", sys.exc_info())
finally:  # executa sempre, independentemente se ocorreu exception
        print("Fim do programa")
