from django.http import HttpResponse
from django.http import JsonResponse
from django.core import serializers
from django.views.generic import View
from django.views.decorators.csrf import csrf_exempt
from .models import User
import json
import hashlib 

class UserActions(View):
  def get(self, request, *args, **kwargs):
    qs = serializers.serialize('python', User.objects.all())
    for user in qs:
      del user["model"]
      del user["fields"]["password"]
    return JsonResponse(qs, safe=False)

@csrf_exempt
def validate(request):
  users = serializers.serialize('python', User.objects.all())
  body = parseBody(request)

  for user in users:
    fields = user["fields"]
    if fields["phone_number"] == body["phone"]:
      if fields["password"] == body["password"]:
        del user["model"]
        del user["fields"]["password"]
        return JsonResponse(user, safe=False)
      else:
        return JsonResponse({ "err": "password is incorrect "})
    pass
  
  return JsonResponse({ "err": "user not found" })

@csrf_exempt
def create(request):
  body = parseBody(request)
  users = serializers.serialize('python', User.objects.all())

  for user in users:
    fields = user["fields"]
    if fields["phone_number"] == body["phone"]:
      return JsonResponse({ "err": "user exists" })

  newUser = User.create(body["name"], body["surname"], body["gender"], body["password"], body["birthday"], body["phone"])
  newUser.save()

  return JsonResponse({ "status": "success" })

@csrf_exempt
def update(request):
  body = parseBody(request)
  user = User.objects.get(id=body["id"])

  user.first_name = body["name"]
  user.last_name = body["surname"]
  user.phone_number = body["phone"]

  user.save()

  return HttpResponse(status=200)

@csrf_exempt
def delete(request):
  body = parseBody(request)
  user = User.objects.get(id=body["id"])

  user.delete()

  return HttpResponse(status=200)

def count(request):
  users = serializers.serialize('python', User.objects.all())
  return JsonResponse({
    "count": len(users)
  })

def generate(request):
  users = serializers.serialize('python', User.objects.all())
  matrix = []
  for i, user in enumerate(users):
    id = user["pk"]
    phone = user["fields"]["phone_number"]
    matrix.append([])
    for c in phone:
      matrix[i].append(int(c) * id)
      

  return JsonResponse({
    "matrix": matrix
  })

def parseBody(request):
  body_unicode = request.body.decode('utf-8')
  body = json.loads(body_unicode)
  return body
