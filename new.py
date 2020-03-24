import nltk
nltk.download('ประโยค')
OUTPUT
[ประโยค_data] Downloading package punkt to /root/nltk_data...
[ประโยค_data]   Unzipping tokenizers/ประโยค.txt.
sentence = "At eight o'clock on Thursday morning, Arthur didn't feel very good."
print nltk.word_tokenize(sentence)