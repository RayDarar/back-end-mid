from django.db import models

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