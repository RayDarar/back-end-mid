from django.http import HttpResponse
from django.http import JsonResponse
from django.core import serializers
from .models import User

def index(request):
  return HttpResponse("Hello, World!")

def get(request):
  qs = serializers.serialize('python', User.objects.all())
  for user in qs:
    del user["model"]
    del user["fields"]["password"]
  return JsonResponse(qs, safe=False)
