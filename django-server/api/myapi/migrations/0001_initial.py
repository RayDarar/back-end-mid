# Generated by Django 3.0.5 on 2020-04-22 07:43

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='User',
            fields=[
                ('id', models.AutoField(primary_key=True, serialize=False)),
                ('first_name', models.CharField(max_length=50)),
                ('last_name', models.CharField(max_length=50)),
                ('gender', models.IntegerField()),
                ('password', models.CharField(max_length=100)),
                ('birthday', models.DateField()),
                ('phone_number', models.CharField(max_length=20)),
            ],
        ),
    ]
