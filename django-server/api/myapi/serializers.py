from rest_framework import serializers
from .models import User

class UserSerializer(serializers.HyperlinkedModelSerializer):
  class Meta:
    model = User
    fields = ('id', 'first_name', 'last_name', 'gender', 'password', 'birthday', 'phone_number')