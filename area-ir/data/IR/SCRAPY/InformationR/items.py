# Define here the models for your scraped items
#
# See documentation in:
# http://doc.scrapy.org/topics/items.html

from scrapy.item import Item, Field

class InformationrIR(Item):
    link = Field()
    pass

class InformationrIssue(Item):
    link = Field()
    volume = Field()
    issue = Field()
    numpapers = Field()
    #title = Field()
    #authors = Field()
    #volume = Field()
    #issue = Field()
    #year = Field()
    #institutions = Field()
    #countries = Field()
    #abtract = Field()
    #references = Field()
    # more options
    #num = Field() # not direct reading pof the counter image
    #subject = Field()
    pass

class InformationrPaper(Item):
    paperid = Field()
    link = Field()
    title = Field()
    authors = Field()
    volume = Field()
    issue = Field()
    issueurl = Field()
    year = Field()
    numref = Field()
    #institutions = Field()
    #countries = Field()
    #abtract = Field()
    citation = Field()
    # more options
    #num = Field() # not direct reading pof the counter image
    #subject = Field()
    pass    

class InformationrNumPapersPerIssue(Item):
    numpapers = Field()
    volume = Field()
    issue = Field()
    pass    
