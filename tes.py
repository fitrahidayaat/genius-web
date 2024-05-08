# print now date and time in string
# Hari-Tanggal-Tahun-Monitoring Frequency (legal)
# Hari-Tanggal-Tahun-Monitoring Frequency (illegal)
import datetime
print(datetime.datetime.now().strftime(f"%d-%m-%Y Monitoring Frequency {legal_freq[0][2]}\t{legal_freq[0][1]} MHz %H:%M:%S")) # legal
print(datetime.datetime.now().strftime(f"%d-%m-%Y Monitoring Frequency {legal_freq[0][1]} MHz %H:%M:%S")) # illegal