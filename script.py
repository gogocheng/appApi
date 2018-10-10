import os
import sys

from PIL import Image

def main(args):
    #print(args)
    try:
        path = args[1]
        image = args[2]
        target = image + "@thumb"
        im = Image.open(os.path.join(path,image))
        im.save(os.path.join(path,target), im.format, quality=20)
        # TEST
        #target2 = image+ "@thumb." + im.format
        #im.save(os.path.join(path, target2), im.format, quality=20)
    except:
        sys.exit(1)
    sys.exit(0)
if __name__ == '__main__':
    main(sys.argv)

