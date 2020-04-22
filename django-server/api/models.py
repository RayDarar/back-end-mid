from django.db import models
from datetime import datetime

class User(models.Model):
  id = models.AutoField(primary_key=True)
  first_name = models.CharField(max_length=50, null=False)
  last_name = models.CharField(max_length=50, null=False)
  gender = models.IntegerField()
  password = models.CharField(max_length=100, null=False)
  birthday = models.DateField()
  phone_number = models.CharField(max_length=20, null=False)

  def __str__(self):
      return self.phone_number

  @classmethod
  def create(cls, name, surname, gender, password, birthday, phone):
    date = datetime.strptime(birthday, '%d-%m-%Y')
    user = cls(first_name=name, last_name=surname, gender=gender, password=password, birthday=date, phone_number=phone)

    return user
    