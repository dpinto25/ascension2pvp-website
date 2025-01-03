import os
import hashlib
import json

PATCHER_DIR = '.'
OUTPUT_FILE = 'file_list.json'

def file_hash(filepath):
    hash_md5 = hashlib.md5()
    with open(filepath, "rb") as f:
        for chunk in iter(lambda: f.read(4096), b""):
            hash_md5.update(chunk)
    return hash_md5.hexdigest()

def generate_file_list(directory):
    file_list = []
    for root, _, files in os.walk(directory):
        for file in files:
            if file.endswith('.eix') or file.endswith('.epk'):
                file_path = os.path.join(root, file)
                file_info = {
                    "name": os.path.relpath(file_path, directory),
                    "hash": file_hash(file_path)
                }
                file_list.append(file_info)
    return file_list

def main():
    file_list = generate_file_list(PATCHER_DIR)
    with open(OUTPUT_FILE, 'w') as f:
        json.dump(file_list, f, indent=4)
    print(f"File list generated and saved to {OUTPUT_FILE}")

if __name__ == "__main__":
    main()