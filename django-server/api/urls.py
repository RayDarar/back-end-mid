from django.urls import path
from . import views

urlpatterns = [
  path("users/get", views.get),
  path("users/validate", views.validate),
  path("users/create", views.create),
  path("users/update", views.update),
  path("users/delete", views.delete),
  path("stats/count", views.count),
  path("stats/generate", views.generate)
]
