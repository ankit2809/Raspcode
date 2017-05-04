import glob
import os
import pandas as pd
path = r'C:\\Python27\\mycsv_files'
all_files = glob.glob(os.path.join(path, "*.csv"))
df_from_each_file = (pd.read_csv(f) for f in all_files)
concatenated_df   = pd.concat(df_from_each_file, ignore_index=True)
pd.set_option('display.expand_frame_repr', False)
print concatenated_df[["City", "Payment_Type"]].groupby(["City"]).count().sort("Payment_Type", ascending=False).head(10)