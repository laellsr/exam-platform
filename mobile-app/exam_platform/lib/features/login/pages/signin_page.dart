import 'package:exam_platform/features/shared/buttons/secondary_button.dart';
import 'package:exam_platform/features/shared/input_text.dart';
import 'package:exam_platform/icons/icons.dart';
import 'package:flutter/material.dart';

class SigninPage extends StatelessWidget {
  const SigninPage({super.key});

  @override
  Widget build(BuildContext context) {
    TextStyle? style = const TextStyle(color: Color(0xff334861));
    return Scaffold(
      body: SafeArea(
        child: SingleChildScrollView(
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.center,
            mainAxisSize: MainAxisSize.min,
            children: [
              Row(
                children: [
                  if (Navigator.canPop(context))
                    GestureDetector(
                      onTap: () {
                        Navigator.pop(context);
                      },
                      child: const Padding(
                        padding: EdgeInsets.only(left: 30),
                        child: Icon(Icons.arrow_back_ios),
                      ),
                    )
                ],
              ),
              const Row(
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  HatIcon(
                    height: 120,
                  ),
                ],
              ),
              Text(
                'Bem vindo!',
                style: style.copyWith(fontSize: 36),
              ),
              const SizedBox(
                height: 25,
              ),
              Padding(
                padding: const EdgeInsets.symmetric(horizontal: 55.0),
                child: Text(
                  'Insira os dados pedidos para prosseguirmos com o cadastro',
                  textAlign: TextAlign.center,
                  style: style.copyWith(fontSize: 16),
                ),
              ),
              const SizedBox(
                height: 53,
              ),
              const Padding(
                padding: EdgeInsets.symmetric(horizontal: 42.0),
                child: InputText(
                  hint: ' Email',
                ),
              ),
              const SizedBox(
                height: 25,
              ),
              const Padding(
                padding: EdgeInsets.symmetric(horizontal: 42.0),
                child: InputText(
                  hint: ' Senha',
                ),
              ),
              const SizedBox(
                height: 25,
              ),
              const Padding(
                  padding: EdgeInsets.symmetric(horizontal: 42.0),
                  child: InputText(
                    hint: ' Insira a senha novamente',
                  )),
              const SizedBox(
                height: 25,
              ),
              Padding(
                padding: const EdgeInsets.symmetric(horizontal: 50.0),
                child: SecondaryButton(
                    child: const Row(
                      mainAxisSize: MainAxisSize.min,
                      children: [Text('Entrar'), Icon(Icons.arrow_forward_ios)],
                    ),
                    onTap: () {}),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
