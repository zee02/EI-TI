import sys
import time
import requests
from time import strftime, gmtime
import getch
array = {'nome': 'porta' , 'valor': '1', 'hora': '2021/04/30 23:59:59'}

def datahora():
    h = strftime("%a, %d %b %Y %H:%M:%S", gmtime())
    return h
def send_to_api( arr ):
    r = requests.post('http://127.0.0.1/EI-TI/api/api.php', data = arr)
    if r.status_code == 200:
        print("Ok: POST realizado com sucesso")
        print(r.status_code)
    else:
        print("Erro: Não foi possível realizar o pedido")
        print(r.status_code)

try:
     print(datahora())
     print("Usage:\n[0]Fecha a porta\n[1]Abre a porta\n[CTRL+C]Terminar")
     while True:
         if getch.getch():
             tecla = getch.getch()
             if tecla == '0':
                 array = {'nome': 'porta' , 'valor': '0', 'hora': datahora()}
                 send_to_api(array)
                 print("\nA porta foi fechada")
             elif tecla == '1':
                 array = {'nome': 'porta' , 'valor': '1', 'hora': datahora()}
                 send_to_api(array)
                 print("\nA porta foi aberta")
             else:
                print("\nOpcao invalida")
                print(tecla)
except KeyboardInterrupt:  # caso haja interrupção devido ao CTRL+C
        print("Programa terminado pelo utilizador")
except:  # caso haja um erro qualquer
        print("Ocorreu um erro:", sys.exc_info())
finally:  # executa sempre, independentemente se ocorreu exception
        print("Fim do programa")
