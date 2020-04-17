

DATA PROCESS:

1- Download CSV and XCLX for DATA and CORPUS from peaceagreements.org
2- CORPUS csv (LireOffice or Google sheet)-> remove column L (Agreement Text)
3 convert CSV to JSON (2-csv2json.py)
4- Edit the json and do several replacements (vim):
    :%s/}, {/},\r {/g
    :%s/""/"NA"/g
    :%s/(excl MENA)/excl MENA/g
    :%s/\ufeff//g
5 conver JSON in JS, just adding: var DAT = [json file contexts] ;


################3333

Files/directories description:
  > 0-readme.txt: this file
  > 1-Header_distinc_nums-in-CSV.ipynb: Jupyter.-notebook that generates the CSV files in CSV/

  The data in 3 csv files:
  > pax_all_agreements_corpus.csv  
  > pax_corpus-CP.csv
  > pax_all_agreements_data.csv

  Data in XLSx version
  > pax_all_agreements_data.xlsx

  Data transformation: CSV to JSON
  > csv2json.py: python that does the trick

  Output edited converted from JSON to JS.
  > pa.js


